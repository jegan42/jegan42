/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_range.c                                         :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan <marvin@42.fr>                      +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/04/02 13:45:44 by jeagan            #+#    #+#             */
/*   Updated: 2019/04/02 13:45:46 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include <stdlib.h>

int	*ft_range(int min, int max)
{
	int		*t;
	int		i;

	if ((min >= max) || (!(t = (int *)malloc(sizeof(*t) * (max - min)))))
		return ((int *)0);
	i = -1;
	while (max != min)
	{
		t[++i] = min;
		++min;
	}
	return (t);
}
