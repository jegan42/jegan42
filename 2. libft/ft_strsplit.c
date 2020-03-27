/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_strsplit.c                                      :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan <marvin@42.fr>                      +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/04/05 14:36:17 by jeagan            #+#    #+#             */
/*   Updated: 2019/04/10 22:52:28 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "libft.h"

char		**ft_strsplit(char const *s, char c)
{
	int		i;
	int		nbw;
	char	**ts;

	if (!s || !(ts = (char **)malloc(sizeof(char *) * (ft_nbw(s, c) + 1))))
		return ((char **)0);
	i = 0;
	nbw = 0;
	while (nbw < ft_nbw(s, c))
	{
		while (s[i] && (s[i] == c))
			++i;
		if (s[i] && !(s[i] == c))
		{
			ts[nbw] = ft_dupw(&s[i], c);
			++nbw;
		}
		while (s[i] && !(s[i] == c))
			++i;
	}
	ts[nbw] = 0;
	return (ts);
}
