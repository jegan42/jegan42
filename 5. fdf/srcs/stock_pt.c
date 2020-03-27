/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   stock_pt.c                                         :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan <jeagan@student.42.fr>              +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/06/09 05:13:53 by jeagan            #+#    #+#             */
/*   Updated: 2019/07/08 11:18:40 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "f_d_f.h"

static int	init_stock(t_var *v)
{
	if (!(v->stck = (int ***)malloc(sizeof(int **) * 2)))
		return (free_err(v, 2, "[malloc > stock_pt/***stck]"));
	v->i = -1;
	while (++v->i < 2)
	{
		if (!(v->stck[v->i] = (int **)malloc(sizeof(int *) * v->height)))
			return (free_err(v, 2, "[malloc > stock_pt/**stck]"));
		v->j = -1;
		while (++v->j < v->height)
			if (!(v->stck[v->i][v->j] = (int *)malloc(sizeof(int) * v->width)))
				return (free_err(v, 2, "[malloc > stock_pt/*stck]"));
	}
	return (1);
}

static int	nb_base(char c)
{
	if (ft_isdigit(c))
		return (c - '0');
	if (('A' <= c && c <= 'F'))
		return (c - 'A' + 10);
	if (('a' <= c && c <= 'f'))
		return (c - 'a' + 10);
	return (0);
}

static int	fill_color(char *color)
{
	int	hex;

	hex = 0;
	if (!color)
		return (0x00FF00);
	if (color[2] && color[3] && color[4] && color[5] && color[6] && color[7])
	{
		hex += nb_base(color[7]);
		hex += nb_base(color[6]) * 16;
		hex += nb_base(color[5]) * 16 * 16;
		hex += nb_base(color[4]) * 16 * 16 * 16;
		hex += nb_base(color[3]) * 16 * 16 * 16 * 16;
		hex += nb_base(color[2]) * 16 * 16 * 16 * 16 * 16;
	}
	return (hex);
}

static int	fill_stock(t_var *try)
{
	if (!(try->tb = ft_strsplit(try->tb_l[try->i], ' ')))
		return (free_err(try, 2, "[malloc > split ' ']"));
	try->j = -1;
	while (try->tb[++try->j])
	{
		if (!(try->add_color = ft_strsplit(try->tb[try->j], ',')))
			return (free_err(try, 2, "[malloc > split ',']"));
		try->stck[0][try->i][try->j] = ft_atoi(try->add_color[0]);
		if ((!try->stck[0][try->i][try->j] && !try->add_color[1]))
			try->stck[1][try->i][try->j] = 0xFFFFFF;
		else if ((try->stck[0][try->i][try->j] < 0 && !try->add_color[1]))
			try->stck[1][try->i][try->j] = 0x0000FF;
		else
			try->stck[1][try->i][try->j] = fill_color(try->add_color[1]);
		if (try->add_color)
			free_tab(try->add_color, NULL, 0);
	}
	if (try->tb)
		free_tab(try->tb, NULL, 0);
	return (1);
}

int			stock_pt(t_var *try)
{
	if (!(init_stock(try)))
		return (free_err(try, 2, "[init_stock]"));
	if (!(try->tb_l = ft_strsplit(try->file, '\n')))
		return (free_err(try, 2, "[malloc > split '\\n']"));
	try->i = -1;
	while (++try->i < try->height)
		if (!(fill_stock(try)))
			return (free_err(try, 2, "[fill_stock]"));
	return (1);
}
